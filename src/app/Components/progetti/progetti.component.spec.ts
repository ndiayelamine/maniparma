import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProgettiComponent } from './progetti.component';

describe('ProgettiComponent', () => {
  let component: ProgettiComponent;
  let fixture: ComponentFixture<ProgettiComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProgettiComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProgettiComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
