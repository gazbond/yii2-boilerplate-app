import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';

import {ExampleView} from './views/example.view';
import {AboutView} from './views/about.view';

import {ROUTING} from './app.routes';
import {AppComponent} from './app.component';

@NgModule({
    imports: [BrowserModule, ROUTING],
    declarations: [
        AppComponent,
        AboutView,
        ExampleView
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
