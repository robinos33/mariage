import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['menu', 'button'];

    connect() {
        this.isOpen = false;
    }

    toggle() {
        this.isOpen = !this.isOpen;
        this.menuTarget.classList.toggle('visible', this.isOpen);
        this.buttonTarget.classList.toggle('open', this.isOpen);
    }
}
