import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        document.addEventListener('turbo:submit-start', (event) => {
            const form = event.target;
            const csrfToken = document.querySelector(
                "meta[name='csrf-token']"
            ).content;

            if (!form.querySelector("input[name='_token']")) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = '_token';
                input.value = csrfToken;
                form.appendChild(input);
            }
        });
    }
}
