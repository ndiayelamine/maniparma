import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { TrasparenzaModel } from 'src/app/Models/trasparenzaModel/trasparenza-model';
import { MethodUtilities } from 'src/app/method-utilities';
import { map, catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class TrasparenzaService {

  constructor(public http: HttpClient) {
    console.log('TrasparenzaService is connected...');
  }

  getDocs(): Observable<TrasparenzaModel[]> {
    return this.http.get(MethodUtilities.urlTrasparenza)
      .pipe(map((data: any) => data.records))
      .pipe(catchError(this.handleError));
  }

  private handleError(error: any): Promise<any> {
    console.error('An error occurred', error);
    return Promise.reject(error.message || error);
  }
}
