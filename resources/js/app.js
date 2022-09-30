import './bootstrap';

import Alpine from 'alpinejs';
import SimpleUploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter';

window.Alpine = Alpine;
window.SimpleUploadAdapter = SimpleUploadAdapter;

Alpine.start();
