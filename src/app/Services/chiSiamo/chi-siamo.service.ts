import { Injectable } from '@angular/core';
import { map, catchError } from 'rxjs/operators';
import { Observable, of } from 'rxjs';
import { ChiSiamoModel } from 'src/app/Models/chiSiamoModel/chi-siamo-model';
import { HttpClient } from '@angular/common/http';
import { NewsModel } from 'src/app/Models/newsModel/news-model';
import { MethodUtilities } from 'src/app/method-utilities';

@Injectable({
  providedIn: 'root'
})
export class ChiSiamoService {

    constructor(public http: HttpClient) {
      console.log('ChiSiamoService is connected...');
    }

    getChiSiamo(): Observable<ChiSiamoModel[]> {
      return this.http.get(MethodUtilities.urlChiSiamo)
        .pipe(map((data: any) => data.records))
        .pipe(catchError(this.handleError));
    }

    getNews(): Observable<NewsModel[]> {
      return this.http.get(MethodUtilities.urlNews)
        .pipe(map((data: any) => data.records))
        .pipe(catchError(this.handleError));
    }

    private handleError(error: any): Promise<any> {
      console.error('An error occurred', error);
      return Promise.reject(error.message || error);
    }
}
