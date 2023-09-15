FilePond.registerPlugin(
    FilePondPluginFileValidateSize,
    FilePondPluginImagePreview,
    FilePondPluginImageExifOrientation,
);
FilePond.create(document.querySelector('.filepond-attachment'), {
    allowImagePreview: true,
    allowImageExifOrientation: true,
    // acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
});

