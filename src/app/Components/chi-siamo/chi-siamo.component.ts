import { Component, OnInit } from '@angular/core';
import { ChiSiamoModel } from 'src/app/Models/chiSiamoModel/chi-siamo-model';
import { ChiSiamoService } from 'src/app/Services/chiSiamo/chi-siamo.service';
import { NewsModel } from 'src/app/Models/newsModel/news-model';

@Component({
  selector: 'app-chi-siamo',
  templateUrl: './chi-siamo.component.html',
  styleUrls: ['./chi-siamo.component.css']
})
export class ChiSiamoComponent implements OnInit {

  listaChiSiamo: ChiSiamoModel[];
  listaNews: NewsModel[];

  constructor(private chiSiamoService: ChiSiamoService) {
    console.log('costructor run...');
    this.listaChiSiamo = [];
    this.listaNews = [];
  }

  ngOnInit() {
    this.chiSiamoService.getChiSiamo().subscribe((res: any) => {
        this.listaChiSiamo = res;
        console.log(this.listaChiSiamo);
      }, error => {
        console.log('AppComponent Error', error);
    });
    this.chiSiamoService.getNews().subscribe((res: any) => {
      if(res != null){
        res[0].active = 'active';
        this.listaNews = res;
        console.log(this.listaNews);
      }
    }, error => {
      console.log('AppComponent Error', error);
  });
  }

}
