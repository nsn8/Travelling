import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
toastr.options = {
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": "3000",
};
window.toastr = toastr;

