import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['accommodationType'];

    connect() {
        this.toggleAccommodationType();
    }


    toggleAccommodationType(event) {
        // Si une valeur est fournie via event, on la prend, sinon on vérifie les boutons cochés
        const selectedValue = event?.target?.value || document.querySelector('input[type="checkbox"]')?.checked;

        if (selectedValue === '1') {
            this.accommodationTypeTarget.classList.remove('hidden');
        } else {
            this.accommodationTypeTarget.classList.add('hidden');
        }
    }
}
