import './bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

// Make Swal available globally
window.Alpine = Alpine;
window.Swal = Swal; // This is the important line

Alpine.start();
