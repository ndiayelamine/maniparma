import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { ProgettiModel } from 'src/app/Models/progettiModel/progetti-model';
import { map, catchError } from 'rxjs/operators';
import { ProgettiMediaModel } from 'src/app/Models/progettiMediaModel/progetti-media-model';
import { MethodUtilities } from 'src/app/method-utilities';

@Injectable({
  providedIn: 'root'
})
export class ProgettiService {

  constructor(public http: HttpClient) {
    console.log('ProgettiService is connected...');
  }

  getProgetti(): Observable<ProgettiModel[]> {
    return this.http.get(MethodUtilities.urlProgetti)
      .pipe(map((data: any) => data.records))
      .pipe(catchError(this.handleError));
  }

  getProgettiMedia(idProgetto: number): Observable<ProgettiMediaModel[]> {
    return this.http.get(MethodUtilities.urlProgettiMedia + '?idProgetto=' + idProgetto)
      .pipe(map((data: any) => data.records))
      .pipe(catchError(this.handleError));
  }

  private handleError(error: any): Promise<any> {
    console.error('An error occurred', error);
    return Promise.reject(error.message || error);
  }
}
