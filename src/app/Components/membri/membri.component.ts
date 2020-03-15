import { Component, OnInit } from '@angular/core';
import { MembriModel } from 'src/app/Models/membriModel/membri-model';
import { MembriService } from 'src/app/Services/membri/membri.service';

@Component({
  selector: 'app-membri',
  templateUrl: './membri.component.html',
  styleUrls: ['./membri.component.css']
})
export class MembriComponent implements OnInit {
  listaMembri: MembriModel[];

  constructor(private membriService: MembriService) {
    console.log('costructor run...');
    this.listaMembri = [];
  }

  ngOnInit() {
    this.membriService.getMembri().subscribe((res: any) => {
      this.listaMembri = res;
      //console.log(this.listaMembri);
      }, error => {
        console.log('AppComponent Error', error);
    });
  }

}
