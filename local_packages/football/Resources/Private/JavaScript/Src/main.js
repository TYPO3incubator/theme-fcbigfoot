import * as bootstrap from 'bootstrap';
import Splide from '@splidejs/splide';

const dropdownElementList = document.querySelectorAll('[data-bs-toggle="dropdown"]')
const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))

const collapseElementList = document.querySelectorAll('[data-bs-toggle="collapse"]')
const collapseList = [...collapseElementList].map(collapseEl => new bootstrap.Collapse(collapseEl))

new Splide( '.splide', {
    perPage: 3,
    breakpoints: {
        768: {
            perPage: 1,
        },
    }
}).mount();
