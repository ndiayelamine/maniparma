import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { NewsModel } from 'src/app/Models/newsModel/news-model';
import { map, catchError } from 'rxjs/operators';
import { MethodUtilities } from 'src/app/method-utilities';

@Injectable({
  providedIn: 'root'
})
export class NewsService {

    constructor(public http: HttpClient) {
      console.log('NewsService is connected...');
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
