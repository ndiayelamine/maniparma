import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { CosaFacciamoModel } from 'src/app/Models/cosaFacciamoModel/cosa-facciamo-model';
import { catchError, map } from 'rxjs/operators';
import { MethodUtilities } from 'src/app/method-utilities';

@Injectable({
  providedIn: 'root'
})
export class CosaFacciamoService {

    constructor(public http: HttpClient) {
      console.log('CosaFacciamoService is connected...');
    }

    getCosaFacciamo(): Observable<CosaFacciamoModel[]> {
      return this.http.get(MethodUtilities.urlCosaFacciamo)
        .pipe(map((data: any) => data.records))
        .pipe(catchError(this.handleError));
    }

    private handleError(error: any): Promise<any> {
      console.error('An error occurred', error);
      return Promise.reject(error.message || error);
    }
}
