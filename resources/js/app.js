import './bootstrap';
import 'flowbite';
import './ckeditor';




ClassicEditor
document.querySelectorAll('.editor').forEach(editorElement => {
    ClassicEditor
        .create(editorElement)
        .then(editor => {
            console.log('Editor inicializado correctamente');
        })
        .catch(error => {
            console.error(error);
        });
});

