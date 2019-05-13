import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CosaFacciamoComponent } from './cosa-facciamo.component';

describe('CosaFacciamoComponent', () => {
  let component: CosaFacciamoComponent;
  let fixture: ComponentFixture<CosaFacciamoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CosaFacciamoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CosaFacciamoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
