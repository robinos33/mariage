import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['details'];

    toggle(element) {
        if(this.detailsTarget.open) {
            this.detailsTarget.open = false;
        }else{
            this.detailsTarget.open = true;
        }
    }
}
