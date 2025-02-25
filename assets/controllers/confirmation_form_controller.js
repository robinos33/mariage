import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['accommodationType'];

    connect() {
        this.toggleAccommodationType();
    }

    toggleAccommodationType(event) {
        const selectedValue = document.querySelector(
            'input[type="checkbox"]'
        )?.checked;

        if (selectedValue === true) {
            this.accommodationTypeTarget.classList.remove('hidden');
        } else {
            this.accommodationTypeTarget.classList.add('hidden');
        }
    }
}
