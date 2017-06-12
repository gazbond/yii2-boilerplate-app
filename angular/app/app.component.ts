import {Component} from '@angular/core';

@Component({
    selector: 'app-component',
    template: `
    <div class="container">
        <h1>Angular v4 boilerplate app</h1>
        <p>
            <a [routerLink]="['']">Example</a> |
            <a [routerLink]="['about']">About</a>
        </p>
        <router-outlet></router-outlet>
    </div>`
})
export class AppComponent {

    public isTestable:boolean = true;

}
