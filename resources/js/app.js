import "./bootstrap";

import Alpine from "alpinejs";

import { Datepicker, Input, initTE, Sidenav } from "tw-elements";
initTE({ Datepicker, Input, Sidenav }, { allowReinits: true });

window.Alpine = Alpine;

Alpine.start();
