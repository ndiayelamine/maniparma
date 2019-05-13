import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PartnersModel } from 'src/app/Models/partnersModel/partners-model';
import { map, catchError } from 'rxjs/operators';
import { MethodUtilities } from 'src/app/method-utilities';

@Injectable({
  providedIn: 'root'
})
export class PartnersService {

    constructor(public http: HttpClient) {
      console.log('PartnersService is connected...');
    }

    getPartners(): Observable<PartnersModel[]> {
      return this.http.get(MethodUtilities.urlPartners)
        .pipe(map((data: any) => data.records))
        .pipe(catchError(this.handleError));
    }

    private handleError(error: any): Promise<any> {
      console.error('An error occurred', error);
      return Promise.reject(error.message || error);
    }
}
