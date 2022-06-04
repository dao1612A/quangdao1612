import * as FilePond from 'filepond';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
var FilepondUpload = {
    inti : function ()
    {
        FilePond.setOptions({
            server: {
                url: URL_UPLOAD,
                process: {
                    // url: './admin/ajax/upload/image',
                    method: 'POST',
                    withCredentials: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    timeout: 7000,
                    onload: (response) => {
                        $("#avatar_uploads").val(response)
                    },
                    onerror: null,
                }
            },
        });

        //https://pqina.nl/filepond/docs/patterns/plugins/file-poster/

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
        );
        FilePond.create( document.querySelector('input[type="file"]'))
    }
}
export default FilepondUpload
