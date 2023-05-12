FilePond.registerPlugin(
    FilePondPluginFileValidateSize,
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
    FilePondPluginFileValidateType,
);

FilePond.create( document.querySelector('.basic-filepond'), { 
    allowImagePreview: true,
    allowMultiple: false,
    allowFileEncode: false,
    required: false,
});

FilePond.setOptions({
    server: {
        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            const formData = new FormData();
            formData.append(fieldName, file, file.name);

            const token = $('#user-token').val();
            formData.append('_token', token);

            const base_url = window.location.origin;
            const url = `${base_url}/admin/upload-csv`;

            const request = new XMLHttpRequest();
            request.open('POST', url);

            request.upload.onprogress = (e) => {
                progress(e.lengthComputable, e.loaded, e.total);
            };

            request.onload = function () {
                if (request.status >= 200 && request.status < 300) {
                    load(request.responseText);
                    
                } else {
                    error('oh no');
                }
            };

            request.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if(this.status == 200) {
                        let response = JSON.parse(this.responseText);
                    } else {
                        // console.log("Error", this.statusText);
                    }
                }
            };

            request.send(formData);

            return {
                abort: () => {
                    request.abort();
                    abort();
                },
            };
        },
    },
});