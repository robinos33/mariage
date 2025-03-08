import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['link'];

    select(event) {
        event.preventDefault();

        const url = event.currentTarget.getAttribute('href');
        document.getElementById('timeline-frame').src = url;
    }
}
