import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CiudadService } from '../../services/ciudad.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  imports: [FormsModule, CommonModule],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {
  ciudadSeleccionada: any = 'Selecciona una ciudad';
  ciudades: any[] = [];
  presupuesto: number | null = null;

  constructor(
    private ciudadService: CiudadService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.getCities();
  }

  getCities(): void {
    this.ciudadService.getCities().subscribe((ciudades: any) => {
      
      this.ciudades = ciudades;
    });
  }

  selectCity(ciudad: any): void {
    this.ciudadSeleccionada = ciudad;
  }

  planTrip(): void {
    if (this.ciudadSeleccionada && this.presupuesto !== null) {
      console.log(this.ciudadSeleccionada.nombre);
      
      this.router.navigate(['/results'], { 
        state: { 
          ciudad_nombre: this.ciudadSeleccionada.nombre,
          ciudad_id: this.ciudadSeleccionada.ciudad_id, 
          presupuesto: this.presupuesto 
        } 
      });
    } else {
      console.error('Debes seleccionar una ciudad y definir un presupuesto.');
    }
  }
}
