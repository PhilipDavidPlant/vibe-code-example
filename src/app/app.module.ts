import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { HttpModule }    from '@angular/http';

//App Components
import { AppComponent } from './app.component';
import { PortsListComponent } from './ports-list/ports-list.component';
import { TopBarComponent } from './top-bar/top-bar.component';
import { TrackerComponent } from './tracker/tracker.component';

//Angular Material Components
import { 
  MatSidenavModule,
  MatButtonModule
} from '@angular/material';

@NgModule({
  declarations: [
    AppComponent,
    PortsListComponent,
    TopBarComponent,
    TrackerComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    HttpModule,
    MatSidenavModule,
    MatButtonModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
