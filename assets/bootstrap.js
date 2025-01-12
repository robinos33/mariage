import { startStimulusApp } from '@symfony/stimulus-bundle';
import ScrollTo from '@stimulus-components/scroll-to';

const app = startStimulusApp();
app.register('scroll-to', ScrollTo)