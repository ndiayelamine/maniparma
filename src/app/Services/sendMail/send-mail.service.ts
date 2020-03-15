import { Injectable } from '@angular/core';
import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { NewsModel } from 'src/app/Models/newsModel/news-model';
import { MethodUtilities } from 'src/app/method-utilities';
import { map, catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class SendMailService {

  constructor(public http: HttpClient) {
    console.log('SendMailService is connected...');
  }

  sendMail(formData: any): Observable<any> {
    const params = new HttpParams({fromString: formData});
    const headers = new HttpHeaders({ 'Access-Control-Allow-Origin': '*' });
    const options = { params, headers };
    return this.http.post(MethodUtilities.urlSendMail, options)
      .pipe(map((data: any) => data))
      .pipe(catchError(this.handleError));
  }

  private handleError(error: any): Promise<any> {
    console.error('An error occurred', error);
    return Promise.reject(error.message || error);
  }
}
