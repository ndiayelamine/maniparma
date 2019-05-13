import { TestBed } from '@angular/core/testing';

import { ProgettiService } from './progetti.service';

describe('ProgettiService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ProgettiService = TestBed.get(ProgettiService);
    expect(service).toBeTruthy();
  });
});
