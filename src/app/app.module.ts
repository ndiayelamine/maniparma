import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { LOCALE_ID } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ProgettiComponent } from './Components/progetti/progetti.component';
import { PartnersComponent } from './Components/partners/partners.component';
import { ChiSiamoComponent } from './Components/chi-siamo/chi-siamo.component';
import { CosaFacciamoComponent } from './Components/cosa-facciamo/cosa-facciamo.component';
import { ContattaciComponent } from './Components/contattaci/contattaci.component';

import { ChiSiamoService } from './Services/chiSiamo/chi-siamo.service';
import { CosaFacciamoService } from './Services/cosaFacciamo/cosa-facciamo.service';
import { PartnersService } from './Services/partners/partners.service';
import { ProgettiService } from './Services/progetti/progetti.service';
import { MembriComponent } from './Components/membri/membri.component';
import { Page404Component } from './components/page404/page404.component';

const appRoutes: Routes = [
  { path: '', component: ChiSiamoComponent },
  { path: './', component: ChiSiamoComponent },
  { path: 'chiSiamo', component: ChiSiamoComponent },
  { path: 'cosaFacciamo', component: CosaFacciamoComponent },
  { path: 'progetti', component: ProgettiComponent },
  { path: 'membri', component: MembriComponent },
  { path: 'partners', component: PartnersComponent },
  { path: 'contattaci', component: ContattaciComponent },
  { path: '**', component: Page404Component }
];

@NgModule({
  declarations: [
    AppComponent,
    ProgettiComponent,
    PartnersComponent,
    ContattaciComponent,
    ChiSiamoComponent,
    CosaFacciamoComponent,
    MembriComponent,
    Page404Component
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(appRoutes, { useHash: true })
  ],
  providers: [ChiSiamoService, { provide: LOCALE_ID, useValue: 'it-IT' },
              CosaFacciamoService, { provide: LOCALE_ID, useValue: 'it-IT' },
              PartnersService, { provide: LOCALE_ID, useValue: 'it-IT' },
              ProgettiService, { provide: LOCALE_ID, useValue: 'it-IT' }],
  bootstrap: [AppComponent]
})
export class AppModule { }
