import { TestBed } from '@angular/core/testing';

import { MembriService } from './membri.service';

describe('MembriService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: MembriService = TestBed.get(MembriService);
    expect(service).toBeTruthy();
  });
});
