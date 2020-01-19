import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TrasparenzaComponent } from './trasparenza.component';

describe('TrasparenzaComponent', () => {
  let component: TrasparenzaComponent;
  let fixture: ComponentFixture<TrasparenzaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TrasparenzaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TrasparenzaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
