import './bootstrap';

import Alpine from 'alpinejs';
import { nouvelleRation } from './nouvelleRation.js'

window.Alpine = Alpine;
Alpine.data('nouvelleRation', nouvelleRation)

Alpine.start();
