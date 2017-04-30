import {Routes, RouterModule} from '@angular/router';

import {ExampleView} from './views/example.view';
import {AboutView} from './views/about.view';

const ROUTES:Routes = [
    {
        path: '',
        component: ExampleView
    },
    {
        path: 'about',
        component: AboutView
    }
];

export const ROUTING = RouterModule.forRoot(ROUTES);
