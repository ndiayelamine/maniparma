import { Component, OnInit } from '@angular/core';
import { TrasparenzaModel } from 'src/app/Models/trasparenzaModel/trasparenza-model';
import { TrasparenzaService } from 'src/app/Services/trasparenza/trasparenza.service';

@Component({
  selector: 'app-trasparenza',
  templateUrl: './trasparenza.component.html',
  styleUrls: ['./trasparenza.component.css']
})
export class TrasparenzaComponent implements OnInit {
  listaDoc: TrasparenzaModel[];

  constructor(private trasparenzaService: TrasparenzaService) {
    console.log('costructor run...');
    this.listaDoc = [];
  }

  ngOnInit() {
    this.trasparenzaService.getDocs().subscribe((res: any) => {
      this.listaDoc = res.reverse();
      // console.log(this.listaDoc);
      }, error => {
        console.log('AppComponent Error', error);
    });
  }

}
