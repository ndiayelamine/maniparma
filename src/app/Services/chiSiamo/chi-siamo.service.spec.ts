import { TestBed } from '@angular/core/testing';

import { ChiSiamoService } from './chi-siamo.service';

describe('ChiSiamoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ChiSiamoService = TestBed.get(ChiSiamoService);
    expect(service).toBeTruthy();
  });
});
