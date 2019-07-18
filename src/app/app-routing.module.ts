import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ChiSiamoComponent } from './Components/chi-siamo/chi-siamo.component';
import { CosaFacciamoComponent } from './Components/cosa-facciamo/cosa-facciamo.component';
import { ProgettiComponent } from './Components/progetti/progetti.component';
import { MembriComponent } from './Components/membri/membri.component';
import { PartnersComponent } from './Components/partners/partners.component';
import { ContattaciComponent } from './Components/contattaci/contattaci.component';
import { Page404Component } from './components/page404/page404.component';

const routes: Routes = [
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
  imports: [RouterModule.forRoot(routes, { useHash: true })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
