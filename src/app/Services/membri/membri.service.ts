import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { MembriModel } from 'src/app/Models/membriModel/membri-model';
import { map, catchError } from 'rxjs/operators';
import { MethodUtilities } from 'src/app/method-utilities';

@Injectable({
  providedIn: 'root'
})
export class MembriService {

    constructor(public http: HttpClient) {
      console.log('MembriService is connected...');
    }

    getMembri(): Observable<MembriModel[]> {
      return this.http.get(MethodUtilities.urlMembri)
        .pipe(map((data: any) => data.records))
        .pipe(catchError(this.handleError));
    }

    private handleError(error: any): Promise<any> {
      console.error('An error occurred', error);
      return Promise.reject(error.message || error);
    }
}
