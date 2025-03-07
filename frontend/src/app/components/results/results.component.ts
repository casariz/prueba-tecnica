import { Component } from '@angular/core';
import { MonedaService } from '../../services/moneda.service';
import { ClimaService } from '../../services/clima.service';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-results',
  imports: [CommonModule],
  templateUrl: './results.component.html',
  styleUrl: './results.component.css'
})
export class ResultsComponent {
  ciudad_id: string | null = null;
  ciudad_nombre: string | null = null;
  presupuesto: number | null = null;
  datosClima: any;
  datosMoneda: any;
  tasaDeCambio: number | null = null;
  resultadoConversion: number | null = null;

  constructor(
    private router: Router,
    private climaService: ClimaService,
    private monedaService: MonedaService
  ) { }

  ngOnInit(): void {
    // Recupera los datos enviados desde Home
    const state = history.state;
    if (state && state.ciudad_id && state.presupuesto) {
      this.ciudad_id = state.ciudad_id;
      this.ciudad_nombre = state.ciudad_nombre;
      this.presupuesto = state.presupuesto;
      this.getWeather();
      this.getCurrency();
    } else {
      this.router.navigate(['/']);
    }
  }

  getWeather(): void {
    if (this.ciudad_id) {
      this.climaService.getClima(this.ciudad_id).subscribe(data => {
        this.datosClima = data.current;
      }, error => {
        console.error('Error al obtener el clima', error);
      });
    }
  }

  getDataCoin(): void {

  }

  getCurrency(): void {
    if (this.ciudad_id) {
      this.monedaService.getMoneda(this.ciudad_id).subscribe((data: any) => {
        this.datosMoneda = data;
        this.tasaDeCambio = data.tasa_cambio;

        if (this.presupuesto && this.tasaDeCambio) {
          this.resultadoConversion = this.presupuesto * this.tasaDeCambio;
        }
      }, (error: any) => {
        console.error('Error al obtener la tasa de cambio', error);
      });
    }
  }
}
