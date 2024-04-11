import * as bootstrap from 'bootstrap';

const dropdownElementList = document.querySelectorAll('[data-bs-toggle="dropdown"]')
const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl))

const collapseElementList = document.querySelectorAll('[data-bs-toggle="collapse"]')
const collapseList = [...collapseElementList].map(collapseEl => new bootstrap.Collapse(collapseEl))
