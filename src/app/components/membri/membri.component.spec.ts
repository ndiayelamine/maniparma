import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MembriComponent } from './membri.component';

describe('MembriComponent', () => {
  let component: MembriComponent;
  let fixture: ComponentFixture<MembriComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MembriComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MembriComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
