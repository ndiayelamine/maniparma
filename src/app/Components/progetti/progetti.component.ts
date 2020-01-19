import { Component, OnInit } from '@angular/core';
import { ProgettiService } from 'src/app/Services/progetti/progetti.service';
import { ProgettiModel } from 'src/app/Models/progettiModel/progetti-model';

@Component({
  selector: 'app-progetti',
  templateUrl: './progetti.component.html',
  styleUrls: ['./progetti.component.css']
})
export class ProgettiComponent implements OnInit {
  listaProgetti: ProgettiModel[];

  constructor(private progettiService: ProgettiService) {
    console.log('costructor run...');
    this.listaProgetti = [];
  }

  ngOnInit() {
    this.progettiService.getProgetti().subscribe((res: any) => {
      if (res != null) {
        this.listaProgetti = this.getMedias(res);
        console.log(this.listaProgetti);
      }
    }, error => {
      console.log('AppComponent Error', error);
    });
  }

  getMedias(res: any) {
    for (let i = 0; i < res.length; i++) {
      this.progettiService.getProgettiMedia(res[i].progetti_id).subscribe((result: any) => {
        if (result != null) {
          res[i].listaProgMedia = result;
          console.log(res[i].listaProgMedia);
        }
      }, error => {
        console.log('AppComponent Error', error);
      });
    }
    return res;
  }

}
