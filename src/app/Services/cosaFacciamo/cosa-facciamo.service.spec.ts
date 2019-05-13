import { TestBed } from '@angular/core/testing';

import { CosaFacciamoService } from './cosa-facciamo.service';

describe('CosaFacciamoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: CosaFacciamoService = TestBed.get(CosaFacciamoService);
    expect(service).toBeTruthy();
  });
});
