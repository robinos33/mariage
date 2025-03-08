import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['element'];
    static values = { delay: Number };

    connect() {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(
                            () => {
                                entry.target.classList.add('visible');
                            },
                            index * (this.delayValue || 150)
                        ); // Délai progressif
                    }
                });
            },
            { threshold: 0.2 }
        );

        this.elementTargets.forEach((el) => observer.observe(el));
    }
}
