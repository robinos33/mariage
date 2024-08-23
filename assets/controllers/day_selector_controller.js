import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['link'];

    select(event) {
        event.preventDefault();

        this.linkTargets.forEach(link => link.classList.remove('active'));

        event.currentTarget.classList.add('active');

        const url = event.currentTarget.getAttribute('href');
        document.getElementById('timeline-frame').src = url;
    }
}
