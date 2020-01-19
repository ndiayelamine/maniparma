import { Component, OnInit } from '@angular/core';
import { CosaFacciamoModel } from 'src/app/Models/cosaFacciamoModel/cosa-facciamo-model';
import { CosaFacciamoService } from 'src/app/Services/cosaFacciamo/cosa-facciamo.service';

@Component({
  selector: 'app-cosa-facciamo',
  templateUrl: './cosa-facciamo.component.html',
  styleUrls: ['./cosa-facciamo.component.css']
})
export class CosaFacciamoComponent implements OnInit {

  listaCosaFacciamo: CosaFacciamoModel[];

  constructor(private cosaFacciamoService: CosaFacciamoService) {
    console.log('costructor run...');
    this.listaCosaFacciamo = [];
  }

  ngOnInit() {
    this.cosaFacciamoService.getCosaFacciamo().subscribe((res: any) => {
      if (res != null) {
        for (let i = 0; i < res.length; i++) {
          if (i % 2 !== 0) {
            res[i].css_class = 'timeline-inverted';
          }
        }
        this.listaCosaFacciamo = res;
        console.log(this.listaCosaFacciamo);
      }
    }, error => {
      console.log('AppComponent Error', error);
    });
  }

}
