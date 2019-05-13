import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'maniparma';
  isAriaExpanded = false;
  toggleisExpand() {
    document.getElementById('myNavbar').setAttribute('aria-expanded', '' + this.isAriaExpanded);
    document.getElementById('myNavbar').className = 'navbar-collapse collapse';
  }
}
