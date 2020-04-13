import { TestBed } from '@angular/core/testing';

import { TrasparenzaService } from './trasparenza.service';

describe('TrasparenzaService', () => {
  let service: TrasparenzaService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(TrasparenzaService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
