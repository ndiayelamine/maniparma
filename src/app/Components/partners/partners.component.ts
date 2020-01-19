import { Component, OnInit } from '@angular/core';
import { PartnersModel } from 'src/app/Models/partnersModel/partners-model';
import { PartnersService } from 'src/app/Services/partners/partners.service';

@Component({
  selector: 'app-partners',
  templateUrl: './partners.component.html',
  styleUrls: ['./partners.component.css']
})
export class PartnersComponent implements OnInit {
  listaPartners: PartnersModel[];

  constructor(private partnersService: PartnersService) {
    console.log('costructor run...');
    this.listaPartners = [];
  }

  ngOnInit() {
    this.partnersService.getPartners().subscribe((res: any) => {
      this.listaPartners = res;
      console.log(this.listaPartners);
      }, error => {
        console.log('AppComponent Error', error);
    });
  }

}
