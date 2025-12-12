import "./bootstrap";

import Swal from "sweetalert2";
window.Swal = Swal;

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

ClassicEditor.create(document.querySelector("#description_en")).catch((error) =>
    console.error(error)
);

ClassicEditor.create(document.querySelector("#description_ar")).catch((error) =>
    console.error(error)
);
